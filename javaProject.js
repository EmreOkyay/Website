function Ordered(){ // POP-UP FUNCTIONS FOR ADD, DELETE AND ORDER BUTTONS
  var Name = document.getElementById("pName").value;
  var Stock = document.getElementById("pStock").value;

  if (!Stock) {
     alert("Please enter how much " + Name + " you want to order");
   }
   else if (!Name) {
     alert("Please enter what you want to order");
   }
   else {
    alert("You have ordered " + Stock +" " + Name);
   }
}


function Added(){
  var Name = document.getElementById("pName").value;
  var Price = document.getElementById("pPrice").value;
  var Stock = document.getElementById("pStock").value;

  if (!Name) {
     alert("Please enter the product name you want to add");
   }else if (!Stock) {
     alert("Please enter how much " + Name + " you want to add");
   }else if (!Price) {
     alert("Please enter the price of the product")
   } else {
     alert("You have added " + Stock +" " + Name + " for " + Price +"$ each");
   }
}


function Deleted(){
  var Name = document.getElementById("pName").value;

  if (!Name) {
    alert("Please enter the product name you want to delete");
   }else {
     alert("You have deleted " + Name);
   }
}

function isChecked(){ // CHECKS IF THE THEME RADIO BUTTONS ARE CHECKED, AND CHANGES THE COLOR BASED ON THAT
  if(document.getElementById("light").checked){
    document.body.style.backgroundImage = "url('floor.png')";
    var h1 = document.getElementById("Main_H1");
    h1.style.color = "#DEB887";
    var p = document.getElementById("divDisplay");
    p.style.color = "black";
    var t = document.getElementById("theme");
    t.style.color = "black";
  }else if (document.getElementById("dark").checked) {
    document.body.style.backgroundImage = "url('dark.png')";
    var h1 = document.getElementById("Main_H1");
    h1.style.color = "gray";
    var p = document.getElementById("divDisplay");
    p.style.color = "white";
    var t = document.getElementById("theme");
    t.style.color = "gray";
  }
}
