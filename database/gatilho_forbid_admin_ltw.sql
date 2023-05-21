CREATE TRIGGER forbid_admin_role_change
BEFORE INSERT ON Change_roles
FOR EACH ROW
WHEN (NEW.roles = 'admin')
BEGIN
    SELECT CASE
        WHEN EXISTS (SELECT * FROM User WHERE idUser = NEW.idUser AND roles = 'admin')
        THEN RAISE(ABORT, 'Cannot assign admin role')
    END;
END;