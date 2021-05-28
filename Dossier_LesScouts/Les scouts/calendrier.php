<?php
$list_fer=array(7);//Liste pour les jours ferié;

$list_spe=array('1986-10-31','2009-4-12','2009-9-23');//Mettez vos dates des evenements ;

$lien_redir="date_info.php";//Lien de redirection apres un clic sur une date,

$clic=1;

$col1="#d6f21a";

$col2="#d6f21a";

$col3="#d6f21a";

$mois_fr = Array("", "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août","Septembre", "Octobre", "Novembre", "Décembre");

if(isset($_GET['mois']) && isset($_GET['annee']))
{
	$mois=$_GET['mois'];
	$annee=$_GET['annee'];
}
else
{
	$mois=date("n");
	$annee=date("Y");
}
$ccl2=array($col1,$col2,$col3);
$l_day=date("t",mktime(0,0,0,$mois,1,$annee));
$x=date("N", mktime(0, 0, 0, $mois,1 , $annee));
$y=date("N", mktime(0, 0, 0, $mois,$l_day , $annee));
$titre=$mois_fr[$mois]." : ".$annee;
//echo $l_day;
?>
<head>
        <meta charset="utf-8"/>
		<link rel="stylesheet" href="styleCalendrier.css"/>
</head>
<body>
	<center>	
		<form name="dt" method="get" action="">
			<select name="mois" id="mois" onChange="change()" class="liste">
				<?php
					for($i=1;$i<13;$i++)
					{
						echo '<option value="'.$i.'"';
						if($i==$mois)
						echo ' selected ';
						echo '>'.$mois_fr[$i].'</option>';
					}
				?>
				</select>
				<select name="annee" id="annee" onChange="change()" class="liste">
				<?php
					for($i=2020;$i<2025;$i++)
					{
						echo '<option value="'.$i.'"';
						if($i==$annee)
							echo ' selected ';
							echo '>'.$i.'</option>';
					}
				?>
			</select>
		</form>
		<table class="tableau"><caption><?php echo $titre ;?></caption>
		<tr><th>Lun/</th><th>Mar/</th><th>Mer/</th><th>Jeu/</th><th>Ven/</th><th>Sam/</th><th>Dim</th></tr>
		<tr>
		<?php
			//echo $y;
			$case=0;
			if($x>1)
				for($i=1;$i<$x;$i++)
			{
				echo '<td class="desactive">&nbsp;</td>';
				$case++;
			}
			for($i=1;$i<($l_day+1);$i++)
			{
				$f=$y=date("N", mktime(0, 0, 0, $mois,$i , $annee));
				$da=$annee."-".$mois."-".$i;
				$lien=$lien_redir;
				$lien.="?dt=".$da;
				echo "<td";
				if(in_array($da, $list_spe))
			{
			echo " class='special' onmouseover='over(this,1,2)'";
			if($clic==1||$clic==2)
				echo " onclick='go_lien(\"$lien\")' ";
			}
				else if(in_array($f, $list_fer))
				{
					echo " class='ferier' onmouseover='over(this,2,2)'";
					if($clic==1)
							echo " onclick='go_lien(\"$lien\")' ";
					}
					else 
					{
						echo" onmouseover='over(this,0,2)' ";
						if($clic==1)
							echo " onclick='go_lien(\"$lien\")' ";
					}
					echo" onmouseout='over(this,0,1)'>$i</td>";
					$case++;
					if($case%7==0)
						echo "</tr><tr>";
	
				}
				if($y!=7)
					for($i=$y;$i<7;$i++)
					{
						echo '<td class="desactive">&nbsp;</td>';
					}
				?></tr>
			</table>
	</center>
</body>

</html>

<script type="text/javascript">
function change()
{
	document.dt.submit();
}
	function over(this_,a,t)
{
	<?php 
	echo "var c2=['$ccl2[0]','$ccl2[1]','$ccl2[2]'];";
	?>
	var col;
	if(t==2)
		this_.style.backgroundColor=c2[a];
	else
		this_.style.backgroundColor="";
}
function go_lien(a)
{
	top.document.location=a;
	
	
}
</script>
