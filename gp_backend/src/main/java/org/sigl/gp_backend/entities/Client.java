package org.sigl.gp_backend.entities;

import java.util.Collection;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.ManyToOne;
import javax.persistence.OneToMany;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;
import lombok.ToString;

@Entity
@Data @AllArgsConstructor @NoArgsConstructor @ToString
public class Client {
	
	@Id @GeneratedValue(strategy=GenerationType.IDENTITY)
	private long id;
	@Column(length=50)
	private String nom;
	@Column(length=30)
	private String prenom;
	@Column(length=30)
	private String nom_entreprise;
	private String adresse;
	@Column(length=20)
	private String ville;
	@Column(length=20)
	private String pays;
	@Column(length=15)
	private String tel;
	@Column(length=50)
	private String email;
	@Column(name="site_web",length=20)
	private String siteWeb;
	@OneToMany(mappedBy="client")
	private Collection<Projet> projets;
	@ManyToOne
	private User creator;
}
