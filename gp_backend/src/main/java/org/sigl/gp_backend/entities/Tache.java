package org.sigl.gp_backend.entities;

import java.util.Date;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.EnumType;
import javax.persistence.Enumerated;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.ManyToOne;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;
import lombok.ToString;

@Entity
@Data @AllArgsConstructor @NoArgsConstructor @ToString
public class Tache {
	
	@Id @GeneratedValue(strategy=GenerationType.IDENTITY)
	private long id;
	@Column(length=30)
	private String titre;
	@Column(columnDefinition="text")
	private String description;
	@Temporal(TemporalType.TIMESTAMP)
	@Column(name="date_debut")
	private Date dateDebut;
	@Temporal(TemporalType.TIMESTAMP)
	@Column(name="date_limite")
	private Date dateLimite;
	@Temporal(TemporalType.TIMESTAMP)
	@Column(name="date_creation")
	private Date dateCreation;
	@Enumerated(EnumType.STRING)
	@Column(length=10)
	private Status status;
	@ManyToOne
	private Membre membre;
}
