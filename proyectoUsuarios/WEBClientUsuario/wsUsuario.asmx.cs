using Microsoft.Ajax.Utilities;
using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Services;
using WEBClientUsuario.Models;
using WEBClientUsuario.Servicios;

namespace WEBClientUsuario
{
    /// <summary>
    /// Summary description for wsUsuario
    /// </summary>
    [WebService(Namespace = "http://tempuri.org/")]
    [WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
    [System.ComponentModel.ToolboxItem(false)]
    // To allow this Web Service to be called from script, using ASP.NET AJAX, uncomment the following line. 
    // [System.Web.Script.Services.ScriptService]
    public class wsUsuario : System.Web.Services.WebService
    {
        DBService db = new DBService();

        [WebMethod]
        public long insert(UsuarioDTO usuario)
        {
            var id = db.insert(usuario);
            return id;

        }

        [WebMethod]
        public Boolean update(UsuarioDTO usuario)
        {
            Boolean exito = db.update(usuario);
            return exito;

        }

        [WebMethod]
        public Boolean delete(int id)
        {
            Boolean exito = db.delete(id);
            return exito;

        }


        [WebMethod]
        public UsuarioDTO getUsuarioById(int id)
        {
            var usuario = db.readById(id);
            return usuario;

        }
        [WebMethod]
        public List<UsuarioDTO> getUsuarios()
        {
            var usuarios = db.read();
            return usuarios;

        }
    }
}
