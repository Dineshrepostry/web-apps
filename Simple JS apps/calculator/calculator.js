var operand1
var operator
var operand2
var out = document.getElementById("output");
var clear = null
var result
var bt = document.getElementById("bt");
function num(elmnt){
    var temp = elmnt.value;
    var txt = document.createTextNode(temp);
    out.appendChild(txt);
    }
function ac(){
    var j = out.childNodes.length;
    for (i=0;i<j;i++) 
    {
    out.removeChild(out.childNodes[0]);
    }
}
function op(elmnt){
    out.normalize()
    operand1 = Number(out.innerHTML);
    operator = elmnt.value;
    ac();
    bt.appendChild(document.createTextNode(operator));
}
function calc(){
    out.normalize()
    operand2 = Number(out.innerHTML);
    ac();
    bt.removeChild(bt.childNodes[0])
    switch (operator) {
        case "+":
          result = operand1 + operand2;
          break;
        case "-":
          result = operand1 - operand2;
          break;
        case "/":
          result = operand1/operand2;
          break;
        case "%":
          result=operand1 % operand2;
          break;
        case "SQRT":
          result = Math.sqrt(operand1);
          break;
        case "*":
          result = operand1*operand2;
          break;
        case "pow":
          result = Math.pow(operand1, operand2);
      }
      out.appendChild(document.createTextNode(result));
}