<!-- graph code begins here-->
<script type="text/javascript" src="js/wz_jsgraphics.js"></script>
<script type="text/javascript" src="js/pie.js">

<!-- Pie Graph script-By Balamurugan S http://www.sbmkpm.com/ //-->
<!-- Script featured/ available at Dynamic Drive code: http://www.dynamicdrive.com //-->

</script>

<div id="pieCanvas" style="overflow: auto; position:relative;height:350px;width:380px;"></div>

<script type="text/javascript">
var p = new pie();
p.add("January",200);
p.add("Feb",20);
p.add("Mar",15);
p.add("Apr",12);
p.add("May",31);
p.add("Jun",41);
p.add("Jul",31);

p.render("pieCanvas", "Pie Graph")

</script>
<!-- graph code ends here-->