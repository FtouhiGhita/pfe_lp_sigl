package org.sigl.gp_backend.dao;

import org.sigl.gp_backend.entities.Tache;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.rest.core.annotation.RepositoryRestResource;
import org.springframework.web.bind.annotation.CrossOrigin;

@CrossOrigin()
@RepositoryRestResource
public interface TacheRepository extends JpaRepository<Tache, Long> { 

}
