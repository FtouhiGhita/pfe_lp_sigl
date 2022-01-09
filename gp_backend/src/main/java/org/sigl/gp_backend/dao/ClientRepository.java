package org.sigl.gp_backend.dao;

import java.util.List;

import org.sigl.gp_backend.entities.Client;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.rest.core.annotation.RepositoryRestResource;
import org.springframework.web.bind.annotation.CrossOrigin;

@CrossOrigin()
@RepositoryRestResource
public interface ClientRepository extends JpaRepository<Client, Long> { 
	List<Client> findByCreatorId(Long id);
}
