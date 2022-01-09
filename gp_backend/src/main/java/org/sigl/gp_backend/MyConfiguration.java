package org.sigl.gp_backend;

import org.sigl.gp_backend.entities.Admin;
import org.sigl.gp_backend.entities.Association;
import org.sigl.gp_backend.entities.ChefDeProjet;
import org.sigl.gp_backend.entities.Client;
import org.sigl.gp_backend.entities.Equipe;
import org.sigl.gp_backend.entities.Membre;
import org.sigl.gp_backend.entities.Projet;
import org.sigl.gp_backend.entities.Tache;
import org.sigl.gp_backend.entities.User;
import org.springframework.data.rest.core.config.RepositoryRestConfiguration;
import org.springframework.data.rest.webmvc.config.RepositoryRestConfigurerAdapter;
import org.springframework.stereotype.Component;

@Component
public class MyConfiguration extends RepositoryRestConfigurerAdapter {

	  @Override
	  public void configureRepositoryRestConfiguration(RepositoryRestConfiguration config) {
	    config.exposeIdsFor(User.class,Admin.class,Association.class,ChefDeProjet.class,Client.class,Equipe.class,Membre.class,Projet.class,Tache.class);
	  }
}