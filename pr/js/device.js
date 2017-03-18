	$(document).ready(function() {
        $("#mapid").change(function(){
            $mid = $(this).val();
            $name = $("#mapid option:selected").text();
            $("#modname").val($name);
            //alert($("#modname").val());
            //alert($mid);
            $.get("pins.php", { mid: $mid }, function(data){
                //alert(data);
                if(data == "0" || data == 0) {
                    alert("Sorry this module has already registered devices.\nPlease choose your other module.");
                    $("#dpinh").val(0);
                } else {
                    $("#dpin").val(data);
                    $("#dpinh").val(data);
                }
            });
        });
        $("#register").click(function(e) {
            e.preventDefault();
            if($("#dpinh").val() != 0) {
                $("form").submit();
            } else {
                alert("Sorry this module has already registered devices.\nPlease choose your other module.");
            }
        });
    });