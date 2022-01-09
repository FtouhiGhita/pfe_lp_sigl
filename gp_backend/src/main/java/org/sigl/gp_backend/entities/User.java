package org.sigl.gp_backend.entities;

import java.util.Collection;
import java.util.Date;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.EnumType;
import javax.persistence.Enumerated;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.OneToMany;
import javax.persistence.OneToOne;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;
import lombok.ToString;

@Entity
@Data @AllArgsConstructor @NoArgsConstructor @ToString
public class User {
	
	@Id @GeneratedValue(strategy=GenerationType.IDENTITY)
	private long id;
	@Column(length=50)
	private String email;
	@Column(length=20)
	private String password;
	@Column(length=15)
	private String role;
	@Temporal(TemporalType.TIMESTAMP)
	@Column(name="date_creation")
	private Date dateCreation;
	@Enumerated(EnumType.STRING)
	@Column(length=10)
	private Etat etat; 
	
	@OneToOne(mappedBy = "user")
	private ChefDeProjet chefDeProjet;
	@OneToOne(mappedBy = "user")
	private Membre membre;
	@OneToOne(mappedBy = "user")
	private Admin admin;

	@OneToMany(mappedBy="creator")
	private Collection<Client> clients;
	@OneToMany(mappedBy="creator")
	private Collection<ChefDeProjet> chefDeProjets;
	@OneToMany(mappedBy="creator")
	private Collection<Membre> membres;

}
