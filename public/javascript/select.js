fetch("Data/select", {
    method: 'GET',
    headers: {
        'Content-Type': 'application/json'
    },
})
    .then(function (response) {
        return response.json();
    })
    .then(function (samples) {
        const ligneTriEl = document.querySelector('.mb-3');
        const selectSampleEl = document.createElement('select');
        selectSampleEl.name = 'sample_1';
        selectSampleEl.classList.add("form-select");

        samples.forEach((sample) => {
            const optionSample = document.createElement('option');
            optionSample.value = sample.Sample;
            optionSample.innerText = sample.Sample;
            selectSampleEl.appendChild(optionSample);
        });
        const sizeInput = document.createElement('input');
        sizeInput.type = 'text';
        sizeInput.name = 'size_1';
        sizeInput.setAttribute('id', 'size-input');
        sizeInput.classList.add("form-control");
        sizeInput.required = true;

        const sizeLabel = document.createElement('label');
        sizeLabel.textContent = "Taille : ";
        sizeLabel.setAttribute('for', 'size-input');
        sizeLabel.classList.add("form-label");

        const typeInput = document.createElement('input');
        typeInput.type = 'text';
        typeInput.name = 'type_1';
        typeInput.setAttribute('id', 'type-input');
        typeInput.classList.add("form-control");
        typeInput.required = true;

        const typeLabel = document.createElement('label');
        typeLabel.textContent = "Type : ";
        typeLabel.setAttribute('for', 'type-input');
        typeLabel.classList.add("form-label");

        const colorInput = document.createElement('input');
        colorInput.type = 'text';
        colorInput.name = 'color_1';
        colorInput.setAttribute('id', 'color-input');
        colorInput.classList.add("form-control");
        colorInput.required = true;

        const colorLabel = document.createElement('label');
        colorLabel.textContent = "Color : ";
        colorLabel.setAttribute('for', 'color-input');
        colorLabel.classList.add("form-label");

        const numberInput = document.createElement('input');
        numberInput.type = 'number';
        numberInput.name = 'number_1';
        numberInput.setAttribute('id', 'number-input');
        numberInput.classList.add("form-control");
        numberInput.required = true;

        const numberLabel = document.createElement('label');
        numberLabel.textContent = "Number : ";
        numberLabel.setAttribute('for', 'number-input');
        numberLabel.classList.add("form-label");


        ligneTriEl.appendChild(selectSampleEl);
        ligneTriEl.appendChild(sizeLabel);
        ligneTriEl.appendChild(sizeInput);
        ligneTriEl.appendChild(typeLabel);
        ligneTriEl.appendChild(typeInput);
        ligneTriEl.appendChild(colorLabel);
        ligneTriEl.appendChild(colorInput);
        ligneTriEl.appendChild(numberLabel);
        ligneTriEl.appendChild(numberInput);



        let indexligne = 2;

        const ajoutBtn = document.querySelector('.ajout_ligne');

        ajoutBtn.addEventListener('click', () => {

            const ligneTri = document.createElement('div');
            ligneTri.classList.add('mb-3');

            const selectSample = document.createElement('select');
            selectSample.name = 'sample_' + indexligne;
            selectSample.classList.add("form-select");

            samples.forEach((sample) => {
                const optionSample = document.createElement('option');
                optionSample.value = sample.Sample;
                optionSample.innerText = sample.Sample;
                selectSample.appendChild(optionSample);
            });

            const sizeInput = document.createElement('input');
            sizeInput.type = 'text';
            sizeInput.name = 'size_' + indexligne;
            sizeInput.setAttribute('id', 'size-input');
            sizeInput.classList.add("form-control");
            sizeInput.required = true;

            const sizeLabel = document.createElement('label');
            sizeLabel.textContent = "Taille : ";
            sizeLabel.setAttribute('for', 'size-input');
            sizeLabel.classList.add("form-label");

            const typeInput = document.createElement('input');
            typeInput.type = 'text';
            typeInput.name = 'type_' + indexligne;
            typeInput.setAttribute('id', 'type-input');
            typeInput.classList.add("form-control");
            typeInput.required = true;

            const typeLabel = document.createElement('label');
            typeLabel.textContent = "Type : ";
            typeLabel.setAttribute('for', 'type-input');
            typeLabel.classList.add("form-label");

            const colorInput = document.createElement('input');
            colorInput.type = 'text';
            colorInput.name = 'color_' + indexligne;
            colorInput.setAttribute('id', 'color-input');
            colorInput.classList.add("form-control");
            colorInput.required = true;

            const colorLabel = document.createElement('label');
            colorLabel.textContent = "Color : ";
            colorLabel.setAttribute('for', 'color-input');
            colorLabel.classList.add("form-label");

            const numberInput = document.createElement('input');
            numberInput.type = 'number';
            numberInput.name = 'number_' + indexligne;
            numberInput.setAttribute('id', 'number-input');
            numberInput.classList.add("form-control");
            numberInput.required = true;

            const numberLabel = document.createElement('label');
            numberLabel.textContent = "Number : ";
            numberLabel.setAttribute('for', 'number-input');
            numberLabel.classList.add("form-label");


            ligneTri.appendChild(selectSample);
            ligneTri.appendChild(sizeLabel);
            ligneTri.appendChild(sizeInput);
            ligneTri.appendChild(typeLabel);
            ligneTri.appendChild(typeInput);
            ligneTri.appendChild(colorLabel);
            ligneTri.appendChild(colorInput);
            ligneTri.appendChild(numberLabel);
            ligneTri.appendChild(numberInput);

            const formulaire = document.querySelector('form');
            formulaire.insertBefore(ligneTri, ajoutBtn);

            indexligne++;
        })
    });