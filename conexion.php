
    <?php
    class conexion {
        private $servidor = 'localhost';
        private $usuario = 'root';
        private $contraseña = '';
        private $conexion;
// calses para la conexion
        public function __construct(){
            try{
                $this->conexion = new PDO("mysql:host=$this->servidor;dbname=tareas",$this->usuario,$this->contraseña);
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }
            catch (PDOException $e){
                return  "falla de conecion" . $e;
            }
        }
        // metodo constructor si falla la conexion

        public function ejecutar( $sql ){ // Insertar / borrar / actualizar
            $this -> conexion -> exec( $sql );
            return $this -> conexion -> lastInsertId();}

        public function consultar($sql){
            $sentencia = $this -> conexion -> prepare($sql);
            $sentencia -> execute();
            return $sentencia -> fetchAll();
            // para ver los datos en una tabla
        }
    }
?> 
