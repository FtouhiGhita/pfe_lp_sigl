package org.sigl.gp_backend.dao;

import org.sigl.gp_backend.entities.Association;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Modifying;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.rest.core.annotation.RepositoryRestResource;
import org.springframework.transaction.annotation.Transactional;
import org.springframework.web.bind.annotation.CrossOrigin;

@CrossOrigin()
@RepositoryRestResource
public interface AssociationRepository extends JpaRepository<Association, Long> { 
	@Transactional
	@Modifying
	@Query("UPDATE Association set actuelle = 0 WHERE membre_id = :membre_id")
	int desassociate(Long membre_id);
	@Transactional
	@Modifying
	@Query("UPDATE Association set equipe_id = :equipe_id, membre_id = :membre_id WHERE id = :id")
	int associate(Long id,Long equipe_id,Long membre_id);
	
}
