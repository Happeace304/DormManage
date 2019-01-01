
var checkboxes = document.querySelectorAll("input[type=checkbox]");
var result;
function checkAll() {

    var bool = checkboxes[0].checked;
    for(var i=1; i< checkboxes.length; i++){
        checkboxes[i].checked= bool;
    }
}
function deleteSelected() {
    var array=[];
    var j=0;
    for(var i=1; i< checkboxes.length; i++){
        if(checkboxes[i].checked==true) {
            var id= checkboxes[i].id;
            array[j]= id;
            j++;

        }
    }
    result=array.join(",");
    document.getElementById("array").value= result;
    console.log(result);
    document.getElementById("massdel").submit();

}
function loadFile() {
    document.getElementById('fake').value=document.getElementById('imglink').files.item(0).name;
    document.getElementById('img_preview').src = URL.createObjectURL(document.getElementById('imglink').files.item(0));

}
