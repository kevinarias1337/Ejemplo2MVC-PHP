<?php
class Tbltipodocumento_model{
    private $db;
    private $tbltipodocumento;

    public function __construct(){
        $this->db=Conexion::getConexion();
        $this->tbltipodocumento=array();
    }

    public function consultar($sql){
        $consulta = $this->db->query($sql);
        while($fila=$consulta->fetch_assoc()){
            $this->tbltipodocumento[]=$fila;
        }
        return $this->tbltipodocumento;
    }
    public function consultarPorId($sql){
        $consulta = $this->db->query($sql);
        $fila=$consulta->fetch_assoc();
        $this->tbltipodocumento[]=$fila;
        return $this->tbltipodocumento;
    }
    public function actualizarTipoDocumento($dato){
        $id=$dato['id'];
        $nombre=$dato['nombre'];
        $consulta="UPDATE tbltipodocumento SET nombre = '$nombre' WHERE idtipo = '$id'";
        mysqli_query($this->db, $consulta) or die ("Error al actualizar los datos");
    } 
    public function eliminarTipoDocumento($id){
        $consulta="DELETE FROM tbltipodocumento WHERE idtipo=$id";
        mysqli_query($this->db, $consulta) or die ("Error al eliminar los datos");
    }
    public function insertarTipoDocumento($dato){
        $nombre=$dato['nombre'];
        $consulta="INSERT INTO tbltipodocumento (nombre) VALUES ('$nombre')";
        mysqli_query($this->db, $consulta) or die ("Error al insertar los datos");
    }
}
?>