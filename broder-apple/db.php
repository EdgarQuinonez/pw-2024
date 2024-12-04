<?php
    $db = new SQLite3("sqlite.db");

    class User {        
        
        private function create_table() {

            global $db;
            try {
                $db->exec("CREATE TABLE IF NOT EXISTS usuario (                    
                    username TEXT,
                    password TEXT,                  
                )");
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
        public function register_user($username, $password) {
            global $db;
            try {
                if (!$username === null and !$password === null) {
                        throw new Exception("El usuario y la contraseña deben de estar definidos.");
                }
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $db->exec( "INSERT INTO usuario VALUES ($username, $hashedPassword)");                                

            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        public function login_user($username, $password) {
            global $db;
            try {
                if (!$username === null and !$password === null) {
                    throw new Exception("El usuario y la contraseña deben de estar definidos.");
            }
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                
                $results = $db->query("SELECT * FROM usuario WHERE username = $username AND password = $hashedPassword");                
                print_r($results, true);
                // if (!isset()) {
                //     throw new Exception("El usuario y/o la contraseña son incorrectos.");
                // }
                
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }    
