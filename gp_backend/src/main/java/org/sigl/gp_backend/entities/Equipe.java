package org.sigl.gp_backend.entities;

import java.util.Collection;
import java.util.Date;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.ManyToOne;
import javax.persistence.OneToMany;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;
import lombok.ToString;

@Entity
@Data @AllArgsConstructor @NoArgsConstructor @ToString
public class Equipe {
	
	@Id @GeneratedValue(strategy=GenerationType.IDENTITY)
	private long id;
	@Column(length=20)
	private String nom;
	@Column(length=20)
	private String titre;
	@Temporal(TemporalType.TIMESTAMP)
	@Column(name="date_creation")
	private Date dateCreation;
	@ManyToOne
	private Projet projet;
	@OneToMany(mappedBy="equipe")
	private Collection<Association> associations;
}
