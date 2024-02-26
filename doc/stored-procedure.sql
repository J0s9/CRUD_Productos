-- ### LISTAR CATEGORIA x ID ###
CREATE OR REPLACE FUNCTION public.func_categoria_r(id integer)
    RETURNS TABLE("ID" integer, sucursal integer, categoria character varying, creacion date, estado boolean)
    LANGUAGE plpgsql
AS $function$
BEGIN
		RETURN QUERY
		SELECT
		cat."ID",
		cat.sucursal,
		cat.categoria,
		cat.creacion,
		cat.estado
		FROM tm_categoria cat
		INNER JOIN tm_sucursal s ON cat.sucursal = s."ID"
		WHERE cat."ID" = id
		AND
		cat.estado = TRUE;
END;
$function$

-- LISTAR CATEGORIA x SUCURSAL
CREATE OR REPLACE FUNCTION public.func_categoria_sucursal(suc integer)
    RETURNS TABLE("ID" integer, sucursal integer, categoria character varying, creacion date, estado boolean)
    LANGUAGE plpgsql
AS $function$
BEGIN
		RETURN QUERY
		SELECT
		cat."ID",
		cat.sucursal,
		cat.categoria,
		cat.creacion,
		cat.estado
		FROM tm_categoria cat
		INNER JOIN tm_sucursal s ON cat.sucursal = s."ID"
		WHERE cat.sucursal = suc
		AND
		cat.estado = TRUE;
END;
$function$

-- ELIMINAR CATEGORIA
CREATE OR REPLACE FUNCTION public.func_categoria_d(id integer)
    RETURNS void
    LANGUAGE plpgsql
AS $function$
BEGIN
UPDATE tm_categoria
	SET estado = FALSE
	WHERE
	"ID" = id;
END;
$function$

-- CREAR CATEGORIA 
CREATE OR REPLACE FUNCTION public.func_categoria_c(suc integer, name character varying)
    RETURNS void
    LANGUAGE plpgsql
AS $function$
BEGIN
	INSERT INTO tm_categoria (sucursal,categoria, creacion, estado)
	VALUES (suc, UPPER(name), NOW(), TRUE);
END;
$function$

-- ACTUALIZAR CATEGORIA 
CREATE OR REPLACE FUNCTION public.func_categoria_u(id integer, suc integer, name character varying)
    RETURNS void
    LANGUAGE plpgsql
AS $function$
BEGIN
	UPDATE tm_categoria c
	SET
	sucursal= suc,
	categoria = UPPER(name)
	WHERE
	"ID" = id;
END;
$function$


-- ### LISTAR ROL x ID ###
CREATE OR REPLACE FUNCTION public.func_rol_r(id integer)
    RETURNS TABLE("ID" integer, sucursal integer, rol character varying, creacion date, estado boolean)
    LANGUAGE plpgsql
AS $function$
BEGIN
		RETURN QUERY
		SELECT
		rol."ID",
		rol.sucursal,
		rol.rol,
		rol.creacion,
		rol.estado
		FROM tm_rol rol
		INNER JOIN tm_sucursal s ON rol.sucursal = s."ID"
		WHERE rol."ID" = id
		AND
		rol.estado = TRUE;
END;
$function$

-- LISTAR ROL x SUCURSAL
CREATE OR REPLACE FUNCTION public.func_rol_sucursal(suc integer)
    RETURNS TABLE("ID" integer, sucursal integer, rol character varying, creacion date, estado boolean)
    LANGUAGE plpgsql
AS $function$
BEGIN
		RETURN QUERY
		SELECT
		rol."ID",
		rol.sucursal,
		rol.rol,
		rol.creacion,
		rol.estado
		FROM tm_rol rol
		INNER JOIN tm_sucursal s ON rol.sucursal = s."ID"
		WHERE rol.sucursal = suc
		AND
		rol.estado = TRUE;
END;
$function$


-- ELIMINAR ROL
CREATE OR REPLACE FUNCTION public.func_rol_d(id integer)
    RETURNS void
    LANGUAGE plpgsql
AS $function$
BEGIN
UPDATE tm_rol
	SET estado = FALSE
	WHERE
	"ID" = id;
END;
$function$

-- CREAR ROL 
CREATE OR REPLACE FUNCTION public.func_rol_c(suc integer, name character varying)
    RETURNS void
    LANGUAGE plpgsql
AS $function$
BEGIN
	INSERT INTO tm_rol (sucursal, rol, creacion, estado)
	VALUES (suc, UPPER(name), NOW(), TRUE);
END;
$function$

-- AUTUALIZAR ROL
CREATE OR REPLACE FUNCTION public.func_rol_u(id integer, suc integer, name character varying)
    RETURNS void
    LANGUAGE plpgsql
AS $function$
BEGIN
	UPDATE tm_rol
	SET
	sucursal= suc,
	rol = UPPER(name)
	WHERE
	"ID" = id;
END;
$function$

-- ### LISTAR COMPANIA x ID ###
CREATE OR REPLACE FUNCTION public.func_compania_r(id integer)
    RETURNS TABLE("ID" integer, compania character varying, creacion date, estado boolean)
    LANGUAGE plpgsql
AS $function$
BEGIN
		RETURN QUERY
		SELECT
		cmp."ID",
		cmp.compania,
		cmp.creacion,
		cmp.estado
		FROM tm_compania cmp
		WHERE cmp."ID" = id
		AND
		cmp.estado = TRUE;
END;
$function$

-- ELIMINAR COMPANIA
CREATE OR REPLACE FUNCTION public.func_compania_d(id integer)
    RETURNS void
    LANGUAGE plpgsql
AS $function$
BEGIN
UPDATE tm_compania
	SET estado = FALSE
	WHERE
	"ID" = id;
END;
$function$

-- CREAR COMPANIA
CREATE OR REPLACE FUNCTION func_compania_c(name VARCHAR)
RETURNS VOID
AS $$
BEGIN
	INSERT INTO tm_compania (compania,creacion,estado)
	VALUES (name, now(), TRUE);
END;
$$ LANGUAGE plpgsql;

-- ACTUALIZAR COMPANIA
CREATE OR REPLACE FUNCTION public.func_compania_u(id integer, name character varying)
    RETURNS void
    LANGUAGE plpgsql
AS $function$
BEGIN
	UPDATE tm_compania
	SET compania = upper(name) 
	WHERE
	"ID" = id;
END;
$function$

-- ### LISTAR EMPRESA x ID ###
CREATE OR REPLACE FUNCTION public.func_empresa_r(id integer)
    RETURNS TABLE("ID" integer, compania integer, empresa character varying, ruc character varying, creacion date, estado boolean)
    LANGUAGE plpgsql
AS $function$
	BEGIN
		RETURN QUERY
		SELECT
		e."ID",
		e.compania,
		e.empresa,
		e.ruc,
		e.creacion,
		e.estado
		FROM
		tm_empresa e
		WHERE
		e."ID" = id 
		AND
		e.estado = TRUE;
	END;
$function$

-- LISTAR EMPRESA x COMPANIA
CREATE OR REPLACE FUNCTION public.func_empresa_compania(cmp integer)
    RETURNS TABLE("ID" integer, empresa character varying, compania integer, creacion date, estado boolean)
    LANGUAGE plpgsql
AS $function$
BEGIN
		RETURN QUERY
		SELECT
		e."ID",
		e.empresa,
		e.compania,
		e.creacion,
		e.estado
		FROM tm_empresa e
		INNER JOIN tm_compania c ON e.compania = c."ID"
		WHERE e.compania = cmp
		AND
		e.estado = TRUE;
END;
$function$

-- ELIMINAR COMPANIA
CREATE OR REPLACE FUNCTION public.func_empresa_d(id integer)
    RETURNS void
    LANGUAGE plpgsql
AS $function$
BEGIN
	UPDATE tm_empresa
	SET estado = FALSE
	WHERE
	"ID" = id;
END;
$function$

-- CREAR COMPANIA
CREATE OR REPLACE FUNCTION public.func_empresa_c(cmp integer, name character varying, r character varying)
    RETURNS void
    LANGUAGE plpgsql
AS $function$
BEGIN
	INSERT INTO tm_empresa (compania,empresa, ruc, creacion, estado)
	VALUES (cmp,UPPER(name), r, now(),TRUE);
	
END;
$function$

-- ACTUALIZAR COMPANIA
CREATE OR REPLACE FUNCTION public.func_empresa_u(id integer, name character varying, r character varying)
    RETURNS void
    LANGUAGE plpgsql
AS $function$
BEGIN
	UPDATE tm_empresa
	SET empresa = UPPER(name),
		ruc = r
	WHERE
	"ID" = id;
END;
$function$

-- ### LISTAR EMPRESA x ID ###
-- LISTAR EMPRESA x COMPANIA
-- ELIMINAR COMPANIA
-- CREAR COMPANIA
-- ACTUALIZAR COMPANIA

-- ### LISTAR EMPRESA x ID ###
-- LISTAR EMPRESA x COMPANIA
-- ELIMINAR COMPANIA
-- CREAR COMPANIA
-- ACTUALIZAR COMPANIA






