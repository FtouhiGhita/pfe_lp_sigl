package org.sigl.gp_backend.dao;

import java.util.List;

import org.sigl.gp_backend.entities.Etat;
import org.sigl.gp_backend.entities.User;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Modifying;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.rest.core.annotation.RepositoryRestResource;
import org.springframework.transaction.annotation.Transactional;
import org.springframework.web.bind.annotation.CrossOrigin;

@CrossOrigin()
@RepositoryRestResource
public interface UserRepository extends JpaRepository<User, Long> { 
	User findByEmail(String email);
	User findByEmailAndPassword(String email, String password);
	List<User> findByEtatLike(Etat etat);
	@Transactional
	@Modifying
	@Query("UPDATE User set etat = 'OCCUPER' WHERE id = :user_id")
	int occuper(Long user_id);
}
