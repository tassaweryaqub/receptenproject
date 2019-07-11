function plus() {
  var x  = parseFloat(document.getElementById('numberone').value);
    var y  = parseFloat(document.getElementById('numbertwo').value);

    var ans =  x + y;
    if(isNaN(ans)) {
      alert("beiden velden invullen met cijfers aub");
      return;
    }
    document.getElementById('answer').innerHTML = ans;
}

function min() {
  var x  = parseFloat(document.getElementById('numberone').value);
    var y  = parseFloat(document.getElementById('numbertwo').value);

    var ans =  x - y;
    if(isNaN(ans)) {
      alert("beiden velden invullen met cijfers aub");
      return;
    }
    document.getElementById('answer').innerHTML = ans;
}

function keer() {
  var x  = parseFloat(document.getElementById('numberone').value);
    var y  = parseFloat(document.getElementById('numbertwo').value);

    var ans =  x * y;
    if(isNaN(ans)) {
      alert("beiden velden invullen met cijfers aub");
      return;
    }
    document.getElementById('answer').innerHTML = ans;
}

function delen() {
    var x  = parseFloat(document.getElementById('numberone').value);
    var y  = parseFloat(document.getElementById('numbertwo').value);

    var ans =  x / y;
    console.log(ans);
    if(isNaN(ans)) {
        alert("beiden velden invullen met cijfers aub");
        return;
    }
    if (!isFinite(ans)) {
        document.getElementById('answer').innerHTML = 'Kan niet delen door 0 ';
    }
    else {
        document.getElementById('answer').innerHTML = ans;
    }
}

function kwadraat() {
  var x  = parseFloat(document.getElementById('numberone').value);
  var y = document.getElementById('numbertwo').value;

    var ans =  Math.pow(x, 2);
    if(isNaN(ans)) {
        alert("alleen getallen invoeren mogelijk!");
        return;
    }
    if (y != '') {
        alert("Het tweede veld hoeft niet ingevuld te worden");
    } else {
        document.getElementById('answer').innerHTML = ans;
    }
}

function macht() {
  var x  = parseFloat(document.getElementById('numberone').value);
    var y  = parseFloat(document.getElementById('numbertwo').value);

    var ans =  Math.pow(x, y);
    if(isNaN(ans)) {
      alert("beiden velden invullen met cijfers aub");
      return;
    }
    document.getElementById('answer').innerHTML = ans;
}

function wortel() {
  var x  = parseFloat(document.getElementById('numberone').value);
  var y  = parseFloat(document.getElementById('numbertwo').value);


    var ans =  Math.sqrt(x);
    if(isNaN(ans)) {
      alert("Alleen getallen invoern mogelijk !");
      return;
  }
  if (y = y) {
      alert("Het tweede veld weglaten bij wortel aub");
  }
  else {
    document.getElementById('answer').innerHTML = ans;
    }
}

function tafel() {
  var x = parseFloat(document.getElementById('numberone').value);
  var y  = parseFloat(document.getElementById('numbertwo').value);

if(isNaN(x)){
  alert("Alleen getallen invoeren is mogelijk!");
  return;
}

if (y = y) {
      alert("De tafel wordt berekend door invoer 1, invoer 2 weglaten aub!");
  }

  var begingetal = 1;
  var eindig = 11;
  var ans = "";

  for(begingetal; begingetal < eindig; begingetal++){
    ans = ans + x + " x " + begingetal + " = " + begingetal * x + "<br>";
  }
  document.getElementById('answer').innerHTML = ans;
}
