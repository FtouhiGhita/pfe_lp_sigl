package org.sigl.gp_backend.dao;

import java.util.List;

import org.sigl.gp_backend.entities.ChefDeProjet;
import org.sigl.gp_backend.entities.Etat;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.rest.core.annotation.RepositoryRestResource;
import org.springframework.web.bind.annotation.CrossOrigin;

@CrossOrigin()
@RepositoryRestResource
public interface ChefDeProjetRepository extends JpaRepository<ChefDeProjet, Long> { 
	List<ChefDeProjet> findByCreatorIdAndUserEtat(Long id, Etat etat);
	List<ChefDeProjet> findByCreatorId(Long id);
}
