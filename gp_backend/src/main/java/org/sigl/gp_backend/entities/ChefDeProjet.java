package org.sigl.gp_backend.entities;

import java.util.Collection;

import javax.persistence.CascadeType;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.EnumType;
import javax.persistence.Enumerated;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.ManyToOne;
import javax.persistence.OneToMany;
import javax.persistence.OneToOne;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;
import lombok.ToString;

@Entity
@Data @AllArgsConstructor @NoArgsConstructor @ToString
public class ChefDeProjet {
	
	@Id @GeneratedValue(strategy=GenerationType.IDENTITY)
	private long id;
	@Column(length=50)
	private String nom;
	@Column(length=30)
	private String prenom;
	@Column(length=30)
	private String email;
	@Column(length=30)
	private String image;
	@Column(length=15)
	private String tel;
	@Enumerated(EnumType.STRING)
	@Column(length=10)
	private Genre genre;
	@OneToMany(mappedBy="chefDeProjet")
	private Collection<Projet> projets;
	@OneToOne(cascade=CascadeType.REMOVE)
	private User user;
	@ManyToOne
	private User creator;

}
