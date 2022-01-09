package org.sigl.gp_backend.dao;

import java.util.List;

import org.sigl.gp_backend.entities.Etat;
import org.sigl.gp_backend.entities.Membre;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.rest.core.annotation.RepositoryRestResource;
import org.springframework.web.bind.annotation.CrossOrigin;

@CrossOrigin()
@RepositoryRestResource
public interface MembreRepository extends JpaRepository<Membre, Long> { 
	List<Membre> findByCreatorIdAndUserEtat(Long id, Etat etat);
	List<Membre> findByCreatorId(Long id);
	List<Membre> findByCreatorChefDeProjetsUserId(Long id);
	List<Membre> findByCreatorChefDeProjetsUserIdAndUserEtat(Long id, Etat etat);
	List<Membre> findByAssociationsActuelleAndAssociationsEquipeAssociationsMembreUserId(boolean actuelle,Long id);
}
