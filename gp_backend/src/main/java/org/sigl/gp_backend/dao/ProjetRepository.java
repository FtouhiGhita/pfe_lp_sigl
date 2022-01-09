package org.sigl.gp_backend.dao;

import java.util.List;

import org.sigl.gp_backend.entities.Projet;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Modifying;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.rest.core.annotation.RepositoryRestResource;
import org.springframework.transaction.annotation.Transactional;
import org.springframework.web.bind.annotation.CrossOrigin;

@CrossOrigin()
@RepositoryRestResource
public interface ProjetRepository extends JpaRepository<Projet, Long> { 
	@Transactional
	@Modifying
	@Query("UPDATE Projet set admin_id = (SELECT id from Admin WHERE user_id=:admin_id), chef_de_projet_id = :chef_id, client_id = :client_id WHERE id = :projet_id")
	int associate(Long admin_id,Long chef_id,Long client_id,Long projet_id);
	List<Projet> findByAdminUserId(Long id);
	List<Projet> findByChefDeProjetUserId(Long id);
}
