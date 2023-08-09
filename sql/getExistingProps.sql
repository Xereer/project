SELECT properties.id, properties.alias FROM properties INNER JOIN typesallow ON typesallow.id_prop = properties.id
                                       AND typesallow.typeId = :id
                                       WHERE typesallow.isArchive = 0 AND properties.isArchive = 0