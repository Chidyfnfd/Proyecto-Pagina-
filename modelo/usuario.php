<?php
class Usuario
{
   private $id;
   private $nombre;
   private $contraseña;
   private $usuarioN;
   private $tipoUsuario;

   // Constructor corregido
   public function __construct($id = null, $nombre = null, $contraseña, $usuarioN = null, $tipoUsuario = null)
   {
      $this->id = $id;
      $this->nombre = $nombre;
      $this->contraseña = $contraseña;
      $this->usuarioN = $usuarioN;
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
      return $this->usuarioN;
   }

   public function obtener_tipoUsuario()
   {
      return $this->tipoUsuario;
   }
}