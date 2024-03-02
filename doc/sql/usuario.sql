-- LISTAR USUARIO POR ID
CREATE OR REPLACE FUNCTION public.func_usuario_r(id uuid)
    RETURNS TABLE(result json)
    LANGUAGE plpgsql
AS $function$
BEGIN
	RETURN QUERY
	SELECT ROW_TO_JSON(r)
	FROM (
		SELECT
			u."ID",
			u.sucursal,
			u.nombre,
			u.apellido,
			u.correo,
			u."DNI",
			u.telefono,
			u."password",
			r.rol
		FROM tm_usuario u
		INNER JOIN tm_rol r 	  ON u.rol 		= r."ID"
		INNER JOIN tm_sucursal s  ON u.sucursal = s."ID"
		WHERE
		u."ID"   = id
		AND
		u.estado = TRUE
	) r;
END;
$function$

-- LISTAR USUARIO POR SUCURSAL
CREATE OR REPLACE FUNCTION public.func_usuario_sucursal(suc integer)
    RETURNS TABLE(result json)
    LANGUAGE plpgsql
AS $function$
BEGIN
	RETURN QUERY
	    SELECT ROW_TO_JSON(r)
		FROM (
		    SELECT
		    u."ID",
		    u.sucursal,
		    u.nombre,
		    u.apellido,
		    u.correo,
		    u.telefono,
		    u."password",
		    r.rol
		    FROM tm_usuario u
		    INNER JOIN tm_rol r 	  ON u.rol 		= r."ID"
		    INNER JOIN tm_sucursal s  ON u.sucursal = s."ID"
		    WHERE 
		    u.sucursal = suc
		    AND
		    u.estado   = TRUE
	    )r;
END;
$function$

-- CREAR USUARIO
CREATE OR REPLACE FUNCTION public.func_usuario_c(suc integer, nom character varying, apell character varying, email character varying, identy character varying, tlf character varying, pass text, rol integer)
    RETURNS void
    LANGUAGE plpgsql
AS $function$
BEGIN
	insert INTO tm_usuario (sucursal, nombre,apellido, correo, "DNI", telefono, "password",rol,creacion,estado)
	VALUES(suc, upper(nom), upper(apell), email, identy, tlf, crypt(pass, gen_salt('bf')), rol,now(),TRUE);
END;
$function$

-- ACTUALIZAR USUARIO
CREATE OR REPLACE FUNCTION public.func_usuario_u(code uuid, suc integer, nom character varying, apell character varying, email character varying, identy character varying, tlf character varying, pass text, r integer)
    RETURNS void
    LANGUAGE plpgsql
AS $function$
BEGIN
    UPDATE tm_usuario
    SET
        sucursal 	= suc,
        nombre 		= upper(nom), 
        apellido 	= upper(apell), 
        correo 		= email, 
        "DNI" 		= identy, 
        telefono 	= tlf,
        "password" 	= crypt(pass, gen_salt('bf')),
        rol 		= r
    WHERE
        "ID" 	= code
    AND
    	estado	= TRUE;
END;
$function$

-- ELIMINAR USUARIO
CREATE OR REPLACE FUNCTION public.func_usuario_d(code uuid)
    RETURNS void
    LANGUAGE plpgsql
AS $function$
BEGIN
		UPDATE tm_usuario
		SET
		estado = FALSE
		WHERE
		"ID"   = code;
END;
$function$