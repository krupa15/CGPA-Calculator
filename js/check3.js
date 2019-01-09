
function check(){
    var id = document.getElementById("id_no").value;
    var sem= document.getElementById("sem").value;
    var rexp = /(1[0-8][a-z][a-z][0-9][0-9][0-9])/g;
    var cond = rexp.test(id);
    if(cond && sem!="10"){
         document.getElementById("sub").disabled=false;
        document.getElementById("err").innerHTML="";
       
    }
    else
    {
        document.getElementById("sub").disabled=true;
        document.getElementById("err").innerHTML="*please insert valid id or valid sem";
    }
}