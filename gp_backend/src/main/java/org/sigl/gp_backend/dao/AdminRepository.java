package org.sigl.gp_backend.dao;

import org.sigl.gp_backend.entities.Admin;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.rest.core.annotation.RepositoryRestResource;
import org.springframework.web.bind.annotation.CrossOrigin;

@CrossOrigin()
@RepositoryRestResource
public interface AdminRepository extends JpaRepository<Admin, Long> { 
	Admin findByUserChefDeProjetsUserId(Long id);
}
