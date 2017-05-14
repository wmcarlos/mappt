<?php
class clsDatos
{
   private $lbCon,$result;
   protected function conectar()
   {
	  $this->lbCon=mysql_connect("localhost","root","tico20467294");
	  mysql_select_db("mappt",$this->lbCon);
   }

   protected function ejecutar($pcSql) { $this->conectar(); $this->result = mysql_query($pcSql) or die(" Error al Ejecutar la Consulta ".mysql_error()); return mysql_affected_rows(); }
   protected function arreglo(){ return mysql_fetch_array($this->result); }
}
?>