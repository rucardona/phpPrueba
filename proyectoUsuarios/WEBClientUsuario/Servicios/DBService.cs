using MySqlConnector;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using WEBClientUsuario.Models;

namespace WEBClientUsuario.Servicios
{
    public class DBService
    {
        private string connectionString = "Server=localhost;User ID=root;Password=root308/*;Database=db_usuario";

        internal UsuarioDTO readById(int id)
        {
            UsuarioDTO usuarios = new UsuarioDTO();
            using (var connection = new MySqlConnection(connectionString))
            {

                connection.Open();

                using (var command = new MySqlCommand($"SELECT * FROM usuario where id={id};", connection))
                using (var reader = command.ExecuteReader())
                {
                    if (reader.Read())
                    {
                        return convertData2Usuario(reader.GetInt32(0), reader.GetString(1), reader.GetString(2), reader.GetString(3), reader.GetInt32(4));

                    }
                }

            }
            return null;
        }
        public List<UsuarioDTO> read()
        {
            List<UsuarioDTO> usuarios = new List<UsuarioDTO>();
            using (var connection = new MySqlConnection(connectionString))
            {

                connection.Open();

                using (var command = new MySqlCommand("SELECT * FROM usuario;", connection))
                using (var reader = command.ExecuteReader())
                {
                    while (reader.Read())
                    {
                        usuarios.Add(convertData2Usuario(reader.GetInt32(0), reader.GetString(1), reader.GetString(2), reader.GetString(3), reader.GetInt32(4)));

                    }
                }

            }
            return usuarios;

        }

        public bool update(UsuarioDTO usuario)
        {

            string sql = $"UPDATE usuario SET Nombres='{usuario.Nombres}', Apellidos='{usuario.Apellidos}', NroIdentificacion='{usuario.Identificacion}', empresaId={usuario.EmpresaId} WHERE id={usuario.Id}";


            try
            {
                using (var connection = new MySqlConnection(connectionString))
                {

                    connection.Open();

                    using (var command = new MySqlCommand(sql, connection))
                    {

                        command.ExecuteNonQuery();
                        return true;
                    }


                }
            }
            catch (Exception)
            {

                return false;
            }
        }

        internal long insert(UsuarioDTO usuario)
        {
            string sql = $"INSERT INTO usuario ( Nombres, Apellidos, NroIdentificacion, empresaId) VALUES( '{usuario.Nombres}', '{usuario.Apellidos}', '{usuario.Identificacion}', {usuario.EmpresaId})";



            try
            {
                using (var connection = new MySqlConnection(connectionString))
                {

                    connection.Open();

                    using (var command = new MySqlCommand(sql, connection))
                    {

                        command.ExecuteNonQuery();
                        return command.LastInsertedId;
                    }


                }
            }
            catch (Exception)
            {

                return 0;
            }
        }

        internal bool delete(int id)
        {
            string sql = $"DELETE FROM usuario WHERE id={id};";

            try
            {
                using (var connection = new MySqlConnection(connectionString))
                {

                    connection.Open();

                    using (var command = new MySqlCommand(sql, connection))
                    {

                        command.ExecuteNonQuery();
                        return true;
                    }


                }
            }
            catch (Exception)
            {

                return false;
            }
        }



        private UsuarioDTO convertData2Usuario(int id, string nombres, string apellidos, string identificacion, int empresaid)
        {
            return new UsuarioDTO()
            {
                Id = id,
                Nombres = nombres,
                Apellidos = apellidos,
                Identificacion = identificacion,
                EmpresaId = empresaid
            };
        }
    }
}