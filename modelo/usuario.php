<?php
class Usuario
{
   private $id;
   private $nombre;
   private $contraseña;
   private $usuario;
   private $tipoUsuario;

   // Constructor corregido
   public function __construct($usuario, $contraseña, $id = null, $nombre = null, $tipoUsuario = null)
   {
      $this->usuario = $usuario;
      $this->contraseña = $contraseña;
      $this->id = $id;
      $this->nombre = $nombre;
      $this->tipoUsuario = $tipoUsuario;
   }

   public function obtener_id()
   {
      return $this->id;
   }

   public function obtener_nombre()
   {
      return $this->nombre;
   }

   public function obtener_contraseña()
   {
      return $this->contraseña;
   }

   public function obtener_usuario()
   {
      return $this->usuario;
   }

   public function obtener_tipoUsuario()
   {
      return $this->tipoUsuario;
   }
}