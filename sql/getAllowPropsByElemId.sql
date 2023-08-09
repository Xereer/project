SELECT properties.alias, properties.id
FROM properties
    LEFT JOIN typesallow ON properties.id = typesallow.id_prop
    LEFT JOIN university ON typesallow.typeId = university.typeID
    LEFT JOIN proptoelem ON proptoelem.propId = properties.id AND proptoelem.id_univ = university.id
WHERE properties.isArchive = 0
  AND typesallow.isArchive = 0
  AND university.isArchive = 0
  AND university.id = :id
  AND (proptoelem.propId IS NULL OR proptoelem.isArchive = 1)