<h2 class="text-center">mode de paiement</h2>

<div class="col-md-offset-4 col-md-4">

   <table class="table">

       <tbody>
<?php foreach ($modePaiement as $mode):?>
<tr>
    <td class="col-md-6" id="paiement">
        <?=$mode['mode_de_paiement']?>
        <a href="/mode-paiement?delete=<?=$mode['id_mode_de_paiement']?>" class="glyphicon glyphicon-remove-circle pull-right"></a>
        <a href="#" id="modifier" value="<?=$mode['id_mode_de_paiement']?>"  class="glyphicon glyphicon-pencil pull-right"></a>

    </td>
</tr>

<? endforeach;?>
<tr id="formAjoute" >
    <td >
    <form class="form-inline" method="post" action="index.php?page=mode-paiement">
        <div class="form-group">
            <label for="modePaiement">ajouter</label>
            <input class="form-control" type="text" id="modePaiement" name="newModePaiement" value="">
        </div>

        <button class="btn btn-default pull-right" type="submit" name="submit" value="submit" >entrer</button>
    </form>
    </td>
</tr>
<tr id="notHover">
    <td id="iconAjoute">
        <div  class="glyphicon glyphicon-plus-sign"></div>
    </td>

</tr>

       </tbody>
   </table>


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

            if(affForm){
                $("#formAjoute").hide(300);
                $trHover();
                $(this).children().attr('class',"glyphicon glyphicon-plus-sign");
                affForm =!affForm;
            }
            else{
                $("#formAjoute").show(300);
                $("tr").unbind();
                $(this).children().attr('class',"glyphicon glyphicon-minus-sign");
                affForm =!affForm;
            }

        });
        /**
         * survol de chaque td
         */
        $trHover=function(){
            $("tr").not("#notHover").not("#formAjoute").hover(function () {

            $(this).css('background-color','#E0E0E0');
                $(this).children().children().show(100);

        },
        function () {
            $(this).css('background-color','white');
            $(this).children().children().hide(100);
        });};

        $trHover();



        $("#modifier").click(function () {


            var $text = $(this).parent().text();
            var $id= $(this).attr('value');

            console.log($id);

            $(this).before("<form id='formMod' class='form-inline' method='post' action='/mode-paiement'>" +
                "<input id=\"idUpdate\" type=\"hidden\" name=\"idModePaiement\" value=\"\">"+
                "<input id=\"inputMod\" class=\"form-control\" type=\"text\" name=\"updateModePaiement\" value=\"\">" +
                "<button  class=\"btn btn-default pull-right\" type=\"submit\" name=\"update\" value=\"update\" >modifier</button>" +
                "<button id='cancel' class=\"btn btn-default pull-right\" type=\"button\" name=\"cancel\" value=\"cancel\" >annuler</button></form>")
            $("#inputMod").val($text.trim());
            $("#idUpdate").val($id.trim());
            //$("#formMod").attr('action',"/mode-paiement?update="+$id);
            edit =true;

            $(this).hide();

            $("tr").unbind();

            $("#cancel").click(function () {

                console.log("test");
                $("#formMod").remove();

                $trHover();

            })

        });

    });
</script>

