-- Table 
user:
    - id
    - nom
    - mdp
    
client:
    - id
    - nom
    - contact

produit:
    - id
    - designation
    - prix_unitaire

caisse:
    - id

achat:
    - id
    - id_client

achat_produit:
    - id
    - id_achat
    - id_produit
    - id_caisse
    - quantite
    - date_achat
