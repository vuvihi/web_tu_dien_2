function autocomplete(start, end, inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      a.setAttribute('style', 'color:' + 'black'  + ';');
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      function index(s, e)
      {
        for (i = s; i < e; i++) {
          /*check if the item starts with the same letters as the text field value:*/
          if (arr[i][0].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
            /*create a DIV element for each matching element:*/
            b = document.createElement("DIV");
            /*make the matching letters bold:*/
            b.innerHTML = "<strong>" + arr[i][0].substr(0, val.length) + "</strong>";
            b.innerHTML += arr[i][0].substr(val.length);
            /*insert a input field that will hold the current array item's value:*/
            b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
            /*execute a function when someone clicks on the item value (DIV element):*/
            b.addEventListener("click", function(e) {
                /*insert the value for the autocomplete text field:*/
                var string = this.getElementsByTagName("input")[0].value;
                var input = string.split(",");
                inp.value = input[0];
                start.value = input[1];
                end.value = input[2];
                /*close the list of autocompleted values,
                (or any other open lists of autocompleted values:*/
                document.getElementById("myform").submit();
                closeAllLists();
            });
            a.appendChild(b);
          }
        }
      }

      switch (val.charAt(0).toUpperCase())
      {
        case 'A':
            {index(43, 6246);}
            break;
        case 'B':
            {index(6246, 10300);}
            break;
        case 'C':
            {index(10300, 18578);}
            break;
        case 'D':
            {index(18578, 23816);}
            break;
        case 'E':
            {index(23816, 28139);}
            break;
        case 'F':
            {index(28139, 32385);}
            break;
        case 'G':
            {index(32385, 35479);}
            break;
        case 'H':
            {index(35479, 38852);}
            break;
        case 'I':
            {index(38852, 43437);}
            break;
        case 'J':
            {index(43437, 44144);}
            break;
        case 'K':
            {index(44144, 44909);}
            break;
        case 'L':
            {index(44909, 47759);}
            break;
        case 'M':
            {index(47759, 51717);}
            break;
        case 'N':
            {index(51717, 53283);}
            break;
        case 'O':
            {index(53283, 56376);}
            break;
        case 'P':
            {index(56376, 65832);}
            break;
        case 'Q':
            {index(65832, 66372);}
            break;
        case 'R':
            {index(66372, 70558);}
            break;
        case 'S':
            {index(70558, 82593);}
            break;
        case 'T':
            {index(82593, 87040);}
            break;
        case 'U':
            {index(87040, 91425);}
            break;
        case 'V':
            {index(91425, 93079);}
            break;
        case 'W':
            {index(93079, 95033);}
            break;
        case 'X':
            {index(95033, 95086);}
            break;
        case 'Y':
            {index(95086, 95277);}
            break;
        case 'Z':
            {index(95277, 95437);}
            break;
        default:
            {index(0, 43);}
      };
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

autocomplete(document.getElementById("start"), document.getElementById("end"), document.getElementById("input"), words);