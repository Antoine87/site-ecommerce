<h2 class="text-center">mode de paiement</h2>

<div class="col-md-offset-3 col-md-6">

   <table class="table">

       <tbody>
<?php foreach ($modePaiement as $mode):?>
<tr>
    <td class="col-md-4" id="paiement">
        <?=$mode['mode_de_paiement']?>
    </td>
    <td>
        <a style="padding-left:30px" href="/mode-paiement?delete=<?=$mode['id_mode_de_paiement']?>"><span class="glyphicon glyphicon-remove-circle pull-right"></span></a>
        <a class="modifier" value="<?=$mode['id_mode_de_paiement']?>"><span class="glyphicon glyphicon-pencil pull-right"></span></a>
    </td>

</tr>

<? endforeach;?>

<tr id="formAjoute" >
    <td >
    <form class="form-inline" method="post" action="index.php?page=mode-paiement">
        <div class="form-group">
            <label  class="control-label col-md-4" for=" modePaiement">Nouveau</label>
            <div class="col-md-8">
                <input class="form-control" type="text" id="modePaiement" name="newModePaiement" value="">
            </div>
        </div>
    </td>
    <td>
        <button class="btn btn-default pull-right" type="submit" name="submit" value="submit" >entrer</button>
    </td>
    </form>
</tr>
<tr id="notHover">
    <td id="iconAjoute">
        <div  class="glyphicon glyphicon-plus-sign"></div>
    </td>
    <td></td>

</tr>

       </tbody>
   </table>

    <h4 id="message" class="text-center text-info"><?=$message?></h4>


</div>


<script src="/dependencies/jquery/dist/jquery.js"></script>

<script>

    $(document).ready(function(){

        var affForm = false;
        var edit =false;

        //initialisation de l'affichage
        $("#formAjoute").hide();
        $("td a").hide();



        $("tr").click(function () {

            $edit = $(this).children().next("td");

                $edit.show();

        });
        /**
         * bascule de l'affichage du formulaire
         */
        $("#iconAjoute").click(function () {

            if (!edit){
            if(affForm){
                $("#formAjoute").hide(300);
                $trHover();
                $(this).children().attr('class',"glyphicon glyphicon-plus-sign");
                affForm =!affForm;
            }
            else{
                $("#formAjoute").show(300);
                $("#formAjoute").css('background-color','#F1F8E9');
                $("tr").unbind();
                $(this).children().attr('class',"glyphicon glyphicon-minus-sign");
                affForm =!affForm;
            };
            }

        });
        /**
         * survol de chaque td
         */
        $trHover=function(){
            $("tr").not("#notHover").not("#formAjoute").hover(function () {

            $(this).css('background-color','#E8EAF6');
                $(this).children().children().show();
                    //$(this).children().children().delay(300).animate({"transform": "scale(2)"});


        },
        function () {
            $(this).css('background-color','transparent');
            $(this).children().children().hide();
        });};

        $trHover();

        $(".modifier").click(function (e) {
            e.preventDefault();

            var $text = $(this).parent().parent().find('td:first').html();

            var $id= $(this).attr('value');

            $(this).parent().parent().css('background-color','#FBE9E7');

            $(this).before("<form id='formMod' class='form-inline' method='post' action='/mode-paiement'>" +
                "<input id=\"idUpdate\" type=\"hidden\" name=\"idModePaiement\" value=\"\">"+
                "<input id=\"inputMod\" class=\"form-control\" type=\"text\" name=\"updateModePaiement\" value=\"\">" +
                "<button  class=\"btn btn-default pull-right\" type=\"submit\" name=\"update\" value=\"update\" >modifier</button>" +
                "<button id='cancel' class=\"btn btn-default pull-right\" type=\"button\" name=\"cancel\" value=\"cancel\" >annuler</button></form>");
            $("#inputMod").val($text.trim());
            $("#idUpdate").val($id.trim());
            //$("#formMod").attr('action',"/mode-paiement?update="+$id);
            edit =true;

            $(this).parent().find('a:first').hide();
            $(this).hide();

            $("tr").unbind();

            $("#cancel").click(function () {

                $("#formMod").remove();
                edit=false;

                $trHover();

            })

        });

        if ($("#message")){

            $("#message").delay(2000).animate({opacity:"0"},"slow");
        }

    });
</script>

