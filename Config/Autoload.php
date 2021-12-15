<?php
	//objectif : charger les fichiers de classe lors d'une instanciation
	class Autoload{

		//$_instance = assure la singularité de l'instance
	 	private static $_instance = null;

	//objectif : créer une instance de autoload si il n'en existe pas afin de préserver la singularité (patron singleton)
        public static function charger()
    	{
        	if(null !== self::$_instance) {
			//lancée si l'autoload est déjà instancié
           		throw new RuntimeException(sprintf('%s is already started', __CLASS__));
       	 	}

	        self::$_instance = new self();

		//si le lancement de l'autoload foire		
	        if(!spl_autoload_register(array(self::$_instance, '_autoload'), false)) {
			//lancée en cas d'erreur au lancement de l'autoload
	            	throw RuntimeException(sprintf('%s : Could not start the autoload', __CLASS__));
	       	 }
	    }

	//objectif : détruire l'instance de l'autoload
        public static function shutDown()
    	{
        	if(null !== self::$_instance) {
		
		//si l'arrêt de l'autoload foire
            	if(!spl_autoload_unregister(array(self::$_instance, '_autoload'))) {
			//lancée en cas d'erreur à l'arret de l'autoload
                	throw new RuntimeException('Could not stop the autoload');
            	}

            	self::$_instance = null;
        	}	
   	 }

	//objectif : charger un fichier de classe
	//$class : classe contenue dans le fichier à charger
        private static function _autoload($class)
    	{	
		//dossier courant
	        global $rep;
		//nom total du fichier avec nom de la classe + ".php"
	        $filename = $class.'.php';
		//liste des répertoires su projet
	        $dir =array('Modele/','./','Config/','Controleurs/','DAL/','Metier/','');
	        foreach ($dir as $d){
			//chemin absolus d'éventuels fichiers de classe
		        $file=$rep.$d.$filename; 
			//vérifie l'existence d'un fichier
		        if (file_exists($file))
		        {
		            include $file;
	        	}
        	}
    
    	}
	}
	
?>
