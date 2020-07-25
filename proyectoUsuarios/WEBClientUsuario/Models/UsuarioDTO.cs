using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace WEBClientUsuario.Models
{
    public class UsuarioDTO
    {
        public int Id { get; set; }
        public String Nombres { get; set; }
        public String Apellidos { get; set; }
        public String Identificacion { get; set; }
        public int EmpresaId { get; set; }
    }
}