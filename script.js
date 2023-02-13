const canvas = document.getElementById('plot');
const ctx = canvas.getContext('2d');

const amplitudeInput1 = document.getElementById('amplitude_input_1');
const omega1 = document.getElementById('frequency_input_1');
const sinus_1 = document.getElementById('pokaz_sinus_1');

const amplitudeInput2 = document.getElementById('amplitude_input_2');
const omega2 = document.getElementById('frequency_input_2');
const sinus_2 = document.getElementById('pokaz_sinus_2');

const dudnienie = document.getElementById('pokaz_wykres')
const dudnienie2 = document.getElementById('pokaz_wykres2')



function drawSinus() {
    if (dudnienie.checked == true && amplitudeInput1.value != amplitudeInput2.value) {
        dudnienie.checked = false;
        dudnienie2.checked = false;
        alert("Amplitudy muszą być sobie równe")
    }
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.beginPath();
    if (sinus_1.checked || sinus_2.checked || dudnienie.checked || dudnienie2.checked){
        ctx.strokeStyle = '#C7C2C2';
        let tmp = parseFloat(canvas.width / 84);
        for (let x = 0; x < canvas.width; x+=tmp) {
            ctx.moveTo(x, 0);
            ctx.lineTo(x, canvas.height);
        }
        ctx.stroke();
    }

    ctx.beginPath();
    if (sinus_1.checked || sinus_2.checked || dudnienie.checked || dudnienie2.checked){
        ctx.strokeStyle = 'red';
        ctx.lineWidth = 2;
        let tmp = canvas.width / 84;
        var i = 0;
        for (let x = 0; x < canvas.width; x+=tmp) {
            i++;
            if(i%10==0){
                ctx.moveTo(x, (canvas.height/2) + 10);
                ctx.lineTo(x, (canvas.height/2) - 10);
            }
        }
        ctx.stroke();
    }

    ctx.beginPath();
    if (sinus_1.checked || sinus_2.checked || dudnienie.checked || dudnienie2.checked){
        ctx.strokeStyle = 'red';
        // ctx.lineWidth = 1;
        for (let y = 0; y < canvas.width; y+=20) {
                ctx.moveTo(0, y);
                ctx.lineTo(5, y);
            
        }
        ctx.stroke();
    }

    ctx.beginPath();
    if (sinus_1.checked || sinus_2.checked || dudnienie.checked || dudnienie2.checked){
        ctx.strokeStyle = '#C7C2C2';
        ctx.lineWidth = 1;
        for(let y = 0; y < canvas.height; y+=20){
            ctx.moveTo(0, y);
            ctx.lineTo(canvas.width, y);
        }
        ctx.stroke();
    }
    ctx.beginPath();
    if (sinus_1.checked) {
		let prev_y = 0;
        ctx.strokeStyle = 'red';
        for (let x = 0; x < (canvas.width*4); x+=1) {
            let y = -amplitudeInput1.value * Math.sin((x * omega1.value * Math.PI) / 180);

			prev_y = y
            ctx.lineTo( 0.25*x, (5 * y) + canvas.height / 2);
        }
        
        ctx.stroke();
    }
    ctx.beginPath();
    if (sinus_2.checked) {
        ctx.strokeStyle = 'blue';
        for (let x = 0; x < (canvas.width*4); x+=1) {
            let y = -amplitudeInput2.value * Math.sin((x * omega2.value * Math.PI) / 180);
            ctx.lineTo( 0.25*x, (5 * y) + (canvas.height / 2));

        }
        ctx.stroke();
    }
    ctx.beginPath();
    if (dudnienie.checked){
        ctx.strokeStyle = 'green';
        for (let x = 0; x < (canvas.width*4); x+=1) {
            let y = (- 2 * parseFloat(amplitudeInput2.value) * Math.cos(((parseFloat(omega1.value) - parseFloat(omega2.value)) / 2) * x * Math.PI / 180 )) * Math.sin(((parseFloat(omega1.value) + parseFloat(omega2.value)) / 2) * x * Math.PI / 180);

            ctx.lineTo( 0.25*x, (5 * y) + (canvas.height / 2));
			
    }
    ctx.stroke();
    }
    ctx.beginPath();
    if (dudnienie2.checked){

        ctx.strokeStyle = 'black';
        for (let x = 0; x < canvas.width*4; x+=1) {
            let y = 2 * amplitudeInput1.value * Math.cos(x * (Math.abs((omega1.value - omega2.value) / 2)) * Math.PI / 180 );
            ctx.lineTo(0.25*x, 5 * y + (canvas.height / 2));
    }
    ctx.stroke();
    }
    ctx.beginPath();
    if (dudnienie2.checked){

        ctx.strokeStyle = 'black';
        for (let x = 0; x < canvas.width*4; x+=1) {
            let y = - 2 * amplitudeInput1.value * Math.cos(x * (Math.abs((omega1.value - omega2.value) / 2)) * Math.PI / 180 );
            ctx.lineTo(0.25*x, 5 * y + (canvas.height / 2));
    }
    ctx.stroke();
    }
    ctx.beginPath();
    if (sinus_1.checked || sinus_2.checked || dudnienie.checked || dudnienie2.checked){
        ctx.strokeStyle = '#434040';
        ctx.lineTo(0, canvas.height/2);
        ctx.lineTo(canvas.width, canvas.height/2);
    }
    ctx.stroke();
}

sinus_1.addEventListener('change', drawSinus);
sinus_2.addEventListener('change', drawSinus);
amplitudeInput1.addEventListener('input', drawSinus);
omega1.addEventListener('input', drawSinus);
amplitudeInput2.addEventListener('input', drawSinus);
omega2.addEventListener('input', drawSinus);


function error(e) {
    if(e.target.checked) {
      if (amplitudeInput1.value != amplitudeInput2.value) {
        e.target.checked = false;
        return alert("Amplitudy muszą być sobie równe")}
    }
    drawSinus();
  }
  
  dudnienie.addEventListener("change", error);
  dudnienie2.addEventListener("change", error);





