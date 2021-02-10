

<script>

var btn = document.querySelectorAll("#vote-btn");

btn = Array.from(btn);

btn.map((ele, index) => ele.addEventListener('click', (e) => {
     e.preventDefault();
    const parent_poll = e.target.parentElement;
   
    const id = Number(ele.attributes[6].value);

  var choices = Array.from(parent_poll.querySelectorAll('input'));
   value = choices.map((ele, index) => {
   if (ele.checked === true) return index;
    })

    var flag=0;
if(value[0]===0){flag=0;}
else {flag=1;}
  //console.log(flag)


const answer=parent_poll.querySelector("#answer"),
id_input=parent_poll.querySelector("#id"),
form=parent_poll.querySelector("#myform");



answer.setAttribute("value",flag)
id_input.setAttribute("value",id);

console.log(answer,id_input)
form.submit();




  }))
  
    </script>
      