package org.sigl.gp_backend.entities;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.ManyToOne;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;
import lombok.ToString;

@Entity
@Data @AllArgsConstructor @NoArgsConstructor @ToString
public class Association {
	
	@Id @GeneratedValue(strategy=GenerationType.IDENTITY)
	private long id;
	private boolean actuelle;
	@ManyToOne
	private Equipe equipe;
	@ManyToOne
	private Membre membre;
}
