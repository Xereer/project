SELECT id, alias
FROM properties
WHERE NOT EXISTS (
    SELECT 1
    FROM typesallow
    WHERE typesallow.id_prop = properties.id AND typesallow.typeId = :id
    AND typesallow.isArchive = 0 AND properties.isArchive = 0
);