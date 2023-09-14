<?php

namespace models;

use PDO;

class DataRepository
{

    protected PDO $pdo;

    public function __construct()
    {
        $this->pdo = \config\Database::getpdo();
    }

    public function validationPrelevement($data)
    {
        $requiredFields = ['sample', 'sea', 'date', 'startTime', 'startLatitude', 'startLongitude'];

        foreach ($requiredFields as $field) {
            if (empty($data[$field])) {
                echo "Champ '$field' manquant pour le prélèvement !";
                return false;
            }
        }

        return true;
    }

    public function formulairePrelevement()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;



            if ($this->validationPrelevement($data)) {
                // Les champs du formulaire sont valides, vous pouvez effectuer les actions nécessaires
                $data['concentration_km2'] = $data["particlesNumber"] / $data["filteredDistance"];
                $data['concentration_m3'] = $data["particlesNumber"] / $data["filteredVolume"];
                // Insérer les données dans la table "prelevements"
                $insert = $this->pdo->prepare("INSERT INTO prelevements (Sample, Sea, Date, Start_Time, Start_Latitude, Start_Longitude, Mid_Latitude, Mid_Longitude, End_Latitude, End_Longitude, Wind_force, Wind_speed, Wind_direction, Sea_state, Water_temperature, Boat_speed, Start_flowmeter, End_flowmeter, Filtered_volume, Filtered_distance, Filtered_surface, Filtered_surface_km, Particles_number,Concentration_km2, Concentration_m3, Commentaires) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

                $insert->execute(array($data["sample"], $data["sea"], $data["date"], $data["startTime"], $data["startLatitude"], $data["startLongitude"], $data["midLatitude"], $data["midLongitude"], $data["endLatitude"], $data["endLongitude"], $data["windForce"], $data["windSpeed"], $data["windDirection"], $data["seaState"], $data["waterTemperature"], $data["boatSpeed"], $data["startFlowMeter"], $data["endFlowMeter"], $data["filteredVolume"], $data["filteredDistance"], $data["filteredSurface"], $data["filteredSurfaceKm"], $data["particlesNumber"], $data['concentration_km2'], $data['concentration_m3'], $data["commentaires"]));

                // apres insertion ?

            }
        }
    }
    public function findAll()
    {
        $select = $this->pdo->prepare("SELECT * FROM prelevements");
        $select->execute();

        return $select->fetchAll();
    }

    public function findAllBySample($id)
    {
        $select = $this->pdo->prepare("SELECT * FROM prelevements WHERE Sample = ?");
        $select->execute(array($id));

        return $select->fetch();
    }

    public function editBySample($id, $post)
    {
        $post['concentration_km2'] = $post["particlesNumber"] / $post["filteredDistance"];
        $post['concentration_m3'] = $post["particlesNumber"] / $post["filteredVolume"];
        $insert = $this->pdo->prepare("UPDATE prelevements SET Sample = ?, Sea = ?, Date = ?, Start_Time = ?, Start_Latitude = ?, Start_Longitude = ?, Mid_Latitude = ?, Mid_Longitude = ?, End_Latitude = ?, End_Longitude = ?, Wind_force = ?, Wind_speed = ?, Wind_direction = ?, Sea_state = ?, Water_temperature = ?, Boat_speed = ?, Start_flowmeter = ?, End_flowmeter = ?, Filtered_volume = ?, Filtered_distance = ?, Filtered_surface = ?, Filtered_surface_km = ?, Particles_number = ?, Concentration_km2 = ?, Concentration_m3 = ?, Commentaires = ? WHERE Sample = ?");
        $insert->execute(array($post["sample"], $post["sea"], $post["date"], $post["startTime"], $post["startLatitude"], $post["startLongitude"], $post["midLatitude"], $post["midLongitude"], $post["endLatitude"], $post["endLongitude"], $post["windForce"], $post["windSpeed"], $post["windDirection"], $post["seaState"], $post["waterTemperature"], $post["boatSpeed"], $post["startFlowMeter"], $post["endFlowMeter"], $post["filteredVolume"], $post["filteredDistance"], $post["filteredSurface"], $post["filteredSurfaceKm"], $post["particlesNumber"], $post['concentration_km2'], $post['concentration_m3'], $post["commentaires"], $id));
    }

    public function deleteBySample($id)
    {
        $delete = $this->pdo->prepare("DELETE FROM prelevements WHERE Sample = ?");
        $delete->execute(array($id));
    }
    public function findAllSample()
    {
        $select = $this->pdo->prepare("SELECT Sample FROM prelevements");
        $select->execute();

        return $select->fetchAll();
    }
    public function tableTri($post)
    {
        for ($i = 1; $i <= count($post) / 5; $i++) {
            $sous_tableau = array(
                "sample" => $post["sample_" . $i],
                "size" => $post["size_" . $i],
                "type" => $post["type_" . $i],
                "color" => $post["color_" . $i],
                "number" => $post["number_" . $i]
            );
            $tableau[] = $sous_tableau;
        }
        return $tableau;
    }

    public function triBySample($id)
    {
        $select = $this->pdo->prepare("SELECT * FROM tri WHERE Sample = ?");
        $select->execute(array($id));

        return $select->fetchAll();
    }
    public function findAllTri()
    {
        $select = $this->pdo->prepare("SELECT * FROM tri");
        $select->execute();

        return $select->fetchAll();
    }

    public function findByTri($id)
    {
        $select = $this->pdo->prepare("SELECT * FROM tri WHERE id = ?");
        $select->execute(array($id));

        return $select->fetch();
    }

    public function editByTri($id, $post)
    {
        $insert = $this->pdo->prepare("UPDATE tri SET Sample = ?, Size = ?, Type = ?, Color = ?, Number = ? WHERE id = ?");
        $insert->execute(array($post["sample"], $post["size"], $post["type"], $post["color"], $post["number"], $id));
    }

    public function deleteByTri($id)
    {
        $delete = $this->pdo->prepare("DELETE FROM tri WHERE id = ?");
        $delete->execute(array($id));
    }
    public function addTri($sample, $size, $type, $color, $number)
    {
        $add = $this->pdo->prepare("INSERT INTO tri (Sample, Size, Type, Color, Number) VALUES (?,?,?,?,?)");
        $add->execute(array($sample, $size, $type, $color, $number));
    }
    public function numberBySample()
    {
        $select = $this->pdo->prepare('select SUM(Number) as "total", Sample FROM tri GROUP BY Sample');
        $select->execute();

        return $select->fetchAll();
    }
    public function findTypeBySample($id)
    {
        $select = $this->pdo->prepare('select Type, SUM(number) as "total" from tri where sample = ? group by Type');
        $select->execute(array($id));

        return $select->fetchAll();
    }
    public function findColorBySample($id)
    {
        $select = $this->pdo->prepare('select Color, SUM(number) as "total" from tri where sample = ? group by Color');
        $select->execute(array($id));

        return $select->fetchAll();
    }
    public function findSizeBySample($id)
    {
        $select = $this->pdo->prepare('select Size, SUM(number) as "total" from tri where sample = ? group by Size');
        $select->execute(array($id));

        return $select->fetchAll();
    }
    public function findDetailBySample($id)
    {
        $select = $this->pdo->prepare('SELECT Water_temperature, Filtered_volume, Commentaires, Sea_state, Start_time, Wind_force FROM prelevements WHERE Sample = ?');
        $select->execute(array($id));

        return $select->fetch();
    }

    public function findSamplesByYear($year)
    {
        $select = $this->pdo->prepare("SELECT * FROM prelevements WHERE SUBSTRING(date, -4) = ?");
        $select->execute(array($year));
        return $select->fetchAll();
    }

    public function findUniqueYears()
    {
        $select = $this->pdo->query("SELECT Distinct SUBSTRING(date, -4) FROM prelevements ");
        return $select->fetchAll(PDO::FETCH_COLUMN);
    }

    public function findAllSeas()
    {
        $select = $this->pdo->prepare("SELECT id_sea, name from mers");
        $select->execute();
        return $select->fetchAll();
    }
    public function findTypeByTri()
    {
        $select = $this->pdo->prepare("SELECT DISTINCT Type from tri");
        $select->execute();
        return $select->fetchAll();
    }

    public function findSizeByTri()
    {
        $select = $this->pdo->prepare("SELECT DISTINCT Size from tri");
        $select->execute();
        return $select->fetchAll();
    }
    public function findColorByTri()
    {
        $select = $this->pdo->prepare("SELECT DISTINCT Color from tri");
        $select->execute();
        return $select->fetchAll();
    }
}
