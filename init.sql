CREATE TABLE short_links(
  ID   INT              NOT NULL AUTO_INCREMENT,
  URL VARCHAR (100)     NOT NULL,
  LINK  VARCHAR (20)     NOT NULL,
  PRIMARY KEY (ID)
);
CREATE INDEX idx_links ON short_links (LINK);