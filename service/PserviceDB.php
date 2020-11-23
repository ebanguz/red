<?php

class PserviceDB implements IServiceBase {

    private $context;

    public function __construct($directory) {

        $this->context = new context($directory);

    }

    public function Getlist($username) {
        $LPE  = array();
        $stmt = $this->context->db->prepare("Select * from post where user=?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            return $LPE;
        } else {
            while ($row = $result->fetch_object()) {
                $p            = new Post();
                $p->id        = $row->id;
                $p->titulo    = $row->titulo;
                $p->fecha     = $row->fecha;
                $p->contenido = $row->contenido;
                $p->user      = $row->user;
                array_push($LPE, $p);
            }
        }
        $stmt->close();
        return $LPE;

    }

    public function GetbyId($id) {

        $p    = new Post();
        $stmt = $this->context->db->prepare("Select * from post where id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            return null;
        } else {
            while ($row = $result->fetch_object()) {
                $p->id        = $row->id;
                $p->titulo    = $row->titulo;
                $p->contenido = $row->contenido;
                $p->fecha     = $row->fecha;
                $p->user      = $row->user;
            }
        }
        $stmt->close();
        return $p;
    }

    public function add($entity) {

        $stmt = $this->context->db->prepare("insert into post (titulo,contenido,fecha,user) Values(?,?,?,?)");
        $stmt->bind_param("ssds", $entity->titulo, $entity->contenido, $entity->fecha, $entity->user);
        $stmt->execute();
        $stmt->close();

    }

    public function update($id, $entity) {

        $stmt = $this->context->db->prepare("update post set titulo=?,contenido=? where id=?");
        $stmt->bind_param("ssi", $entity->titulo, $entity->contenido, $id);
        $stmt->execute();
        $stmt->close();

    }

    public function delete($id) {

        $stmt = $this->context->db->prepare("delete from post where id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();

    }

}

?>