package org.sigl.gp_backend.dao;

import java.util.List;

import org.sigl.gp_backend.entities.Equipe;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.rest.core.annotation.RepositoryRestResource;
import org.springframework.web.bind.annotation.CrossOrigin;

@CrossOrigin()
@RepositoryRestResource
public interface EquipeRepository extends JpaRepository<Equipe, Long> { 

	List<Equipe> findByProjetChefDeProjetUserId(Long id);
}
