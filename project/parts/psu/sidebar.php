
<!-- ************** ************** ************** ************** ************** ************** ************** ************** -->
<div class="panel-group" id="accordion">
<!-- ########################################################################################### -->
<?php
$headers = array("Brand","Price","Generation","Series","Base Clock","Max Turbo","# Core","# Thread","Socket","L3 Cashe", "L2 Cashe", "TDP");
$columns = array("brand","price","gen","series","speed","turbo","core","thread","socket","lthree","ltwo","tdp");
$a=0;
while($a < sizeof($headers)){
  //get fields from database
  $query = $conn->prepare("SELECT DISTINCT $columns[$a] FROM cpu WHERE $columns[$a] <> 'NULL' ORDER BY $columns[$a] ASC");
  $query->execute();
  $result = $query->fetchAll();
  echo '
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$a.'" style = "text-decoration:none;">
        '.$headers[$a].'</a>
      </h4>
    </div>
    <div id="collapse'.$a.'" class="panel-collapse collapse">
      <div class="panel-body">
      <form action="/PC-Parts-Database/project/parts/cpu/cpu.php" method="get">';
      $b=0;
      while($b < sizeof($result)){
        echo '
        <input type="checkbox" name="'.$columns[$a].''.$b.'" value="'.$result[$b][0].'" /> '.$result[$b][0].'<br>
        ';
        $b+=1;
      }
        echo '<input type="submit" value="Submit">
      </form>
      </div>
    </div>
  </div>
  ';
  $a+=1;
}
?>
  <!-- ########################################################################################### -->
</div>
<!-- ************** ************** ************** ************** ************** ************** ************** ************** -->













<!-- <input type="checkbox" name="s1" value="2.7" /> 2.7<br>
<input type="checkbox" name="s1" value="2.8" /> 2.8<br>
<input type="checkbox" name="s1" value="2.9" /> 2.9<br>
<input type="checkbox" name="s1" value="3.0" /> 3.0<br>
<input type="checkbox" name="s1" value="3.1" /> 3.1<br>
<input type="checkbox" name="s1" value="3.2" /> 3.2<br>
<input type="checkbox" name="s1" value="3.3" /> 3.3<br>
<input type="checkbox" name="s1" value="3.4" /> 3.4<br>
<input type="checkbox" name="s1" value="3.5" /> 3.5<br>
<input type="checkbox" name="s1" value="3.6" /> 3.6<br>
<input type="checkbox" name="s1" value="3.7" /> 3.7<br>
<input type="checkbox" name="s1" value="3.8" /> 3.8<br>
<input type="checkbox" name="s1" value="3.9" /> 3.9<br>
<input type="checkbox" name="s1" value="4.0" /> 4.0<br>
<input type="checkbox" name="s1" value="4.1" /> 4.1<br>
<input type="checkbox" name="s1" value="4.2" /> 4.2<br>
<input type="checkbox" name="s1" value="4.3" /> 4.3<br> -->
