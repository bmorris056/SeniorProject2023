DROP TABLE LOGIN;
DROP TABLE CATTLE_TO_PASTURE;
DROP TABLE CATTLE_TO_VET;
DROP TABLE FIELD_TO_HAY_BATCH;
DROP TABLE HAY_BATCH_TO_PASTURE;
drop table CATTLE_TO_HAY_BATCH;
ALTER TABLE cattle DROP FOREIGN KEY PASTURE_ID_FK;
ALTER TABLE hay_batch DROP FOREIGN KEY PASTURE_ID_HAY_BATCH_FK;
DROP TABLE PASTURE;
DROP TABLE HAY_BATCH;
drop table FIELD_TO_CATTLE;
DROP TABLE FIELDS;
DROP TABLE HAY_STORAGE;
DROP TABLE CATTLE;
DROP TABLE VET;


