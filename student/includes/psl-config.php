<?php

    /**
     * These are the database login details
     */
    define("HOST", "localhost"); 			// The host you want to connect to.
    define("USER", "root"); 			// The database username.
    define("PASSWORD", ""); 	// The database password.
    define("DATABASE", "greesyhands");             // The database name.

    define("CAN_REGISTER", "any");
    define("DEFAULT_ROLE", "member");

    /**
     * Is this a secure connection?  The default is FALSE, but the use of an
     * HTTPS connection for logging in is recommended.
     *
     * If you are using an HTTPS connection, change this to TRUE
     */
    define("SECURE", FALSE);    // For development purposes only!!!!